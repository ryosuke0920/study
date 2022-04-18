<?php

if (!class_exists('Madara_Schedule')) {

	class Madara_Schedule
	{
		const ACTION_1 = __CLASS__ . '_Action1';
		const ACTION_2 = __CLASS__ . '_Action2';
		const ACTION_3 = __CLASS__ . '_Action3';

		const DELAY_TO_START = 10;
		const ONE_MINUTE = 60;
		const INTERBAL = self::ONE_MINUTE * 60;

		public function __construct()
		{
		}

		public function init()
		{
			add_action('init', [$this, 'wp_init']);

			// アクションの実行中はwp-cron.phpが起動し続け、アクションが完了すると、wp-cron.phpがhttpdのアクセスログに出力される。
			// 1つのアクションに複数の処理を登録(add_action)すると、先行の処理が完了してから、後続の処理が開始される。
			// 1分間隔のcronにて、処理時間が1分を超えた場合、２分目、3分目の処理は呼び出されない。
			// 300secを超えるとタイムアウトと見做されるが、実行は継続されている。
			// 前回実行分がタイムアウトと判定されると、次のcronが実行可能になる。前回の分と今回の分が並列で実行中になる。
			// Apacheを再起動してアクションを停止しても、画面上は実行中(in-progress)のままになる。
			// 複数の異なるアクションをスケジュールした場合、複数のアクションが１つのwp-cron.phpの中で順番に実行される。
			// 実行時間が長いと次のwp-cron.phpに繰り越される。

			add_action(
				self::ACTION_1,
				[$this, 'log_vital']
			);

			add_action(
				self::ACTION_2,
				[$this, 'log_dup_2']
			);

			add_action(
				self::ACTION_3,
				[$this, 'log_dup_3']
			);
		}

		public function wp_init()
		{
			if (!as_has_scheduled_action(self::ACTION_1)) {
				$action_id = as_schedule_cron_action(
					self::DELAY_TO_START,
					'* * * * * *',
					self::ACTION_1,
					[],
					self::ACTION_1
				);
			}
			if (!as_has_scheduled_action(self::ACTION_2)) {
				$action_id = as_schedule_cron_action(
					self::DELAY_TO_START,
					'* * * * * *',
					self::ACTION_2,
					[],
					self::ACTION_2
				);
			}
			if (!as_has_scheduled_action(self::ACTION_3)) {
				$action_id = as_schedule_cron_action(
					self::DELAY_TO_START,
					'* * * * * *',
					self::ACTION_3,
					[],
					self::ACTION_3
				);
			}
		}

		public function log_dup_2()
		{
			$this->see_log(__FUNCTION__, 2);
		}

		public function log_dup_3()
		{
			$this->see_log(__FUNCTION__, 3);
		}

		public function log_for_3_minutes()
		{
			$this->see_log(__FUNCTION__, 180);
		}

		public function log_vital()
		{
			$this->see_log(__FUNCTION__, 40);
		}

		private function see_log($func, $sec)
		{
			error_log($func . " start.");
			$sum = 0;
			$wait = 60;
			while ($sum < $sec) {
				if (($sum + $wait) <= $sec) {
					sleep($wait);
					$sum += $wait;
				} else {
					sleep($sec - $sum);
					$sum += ($sec - $sum);
				}
				error_log($func . ' spend sec=' . $sum);
			}
			error_log($func . " end.");
		}
	}
}
