<?php

if ( ! class_exists( 'WP_Job' ) ) {
	abstract class WP_Job {

		/**
		 * @var int
		 */
		private $delay = 0;

		/**
		 * @var bool
		 */
		private $deleted = false;

		/**
		 * @var bool
		 */
		private $released = false;

		/**
		 * Delete the job from the queue
		 */
		protected function delete() {
			$this->deleted = true;
		}

		/**
		 * Release a job back onto the queue
		 *
		 * @param int $delay
		 */
		protected function release( $delay = 0 ) {
			$this->released = true;
			$this->delay    = $delay;
		}

		/**
		 * Is deleted.
		 *
		 * @return bool
		 */
		public function is_deleted() {
			return $this->deleted;
		}

		/**
		 * Is released.
		 *
		 * @return bool
		 */
		public function is_released() {
			return $this->released;
		}

		/**
		 * Is deleted for released
		 * 
		 * @return bool
		 */
		public function is_deleted_or_released() {
			return $this->is_deleted() || $this->is_released();
		}

		/**
		 * Get delay.
		 *
		 * @return int
		 */
		public function get_delay() {
			return $this->delay;
		}

		/**
		 * Handle the job.
		 */
		abstract public function handle();

	}
}