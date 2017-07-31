<?php

class CRM_DoctorWhen_Cleanups {

  protected $queueName;

  /**
   * @var array
   *   Array(string $id => CRM_DoctorWhen_Cleanups_Base).
   */
  protected $tasks;

  public function __construct($queueName = 'DoctorWhen') {
    $this->queueName = $queueName;
    $this->tasks = array(
      'SuspendTracking' => new CRM_DoctorWhen_Cleanups_SuspendTracking(),
      'ActivityCreated' => new CRM_DoctorWhen_Cleanups_ActivityCreated(),
      'ActivityModified' => new CRM_DoctorWhen_Cleanups_ActivityModified(),
      'CaseCreated' => new CRM_DoctorWhen_Cleanups_CaseCreated(),
      'CaseModified' => new CRM_DoctorWhen_Cleanups_CaseModified(),
      'RestoreTracking' => new CRM_DoctorWhen_Cleanups_RestoreTracking(),
    );
  }

  /**
   *
   * @param array $options
   *   Array with keys:
   *     - tasks: array, list of enabled tasks
   *       Ex: array('ActivityCreated', 'ActivityModified').
   * @return CRM_Queue_Queue
   */
  public function buildQueue($options) {
    $queue = CRM_Queue_Service::singleton()->create(array(
      'type' => 'Sql',
      'name' => $this->queueName,
      'reset' => TRUE,
    ));

    $options['tasks'] = array_unique(array_merge($options['tasks'],
      array('SuspendTracking', 'RestoreTracking')));

    foreach ($this->getAll() as $id => $provider) {
      /** @var CRM_DoctorWhen_Cleanups_Base $provider */
      if (in_array($id, $options['tasks'])) {
        $provider->enqueue($queue, $options);
      }
    }

    return $queue;
  }

  /**
   * @return array
   */
  public function getAll() {
    return $this->tasks;
  }

}
