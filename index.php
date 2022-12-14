<?php
require_once 'classes/Task.php';

$task = new Task(1, 'new');

assert($task->getNewStatus(Task::ACTION_CANCEL) === Task::STATUS_CANCEL, 'cancel');
assert($task->getNewStatus(Task::ACTION_RESPOND) === Task::STATUS_WAIT, 'waiting');
assert($task->getNewStatus(Task::ACTION_ACCEPT) === Task::STATUS_WORK, 'at_work');
assert($task->getNewStatus(Task::ACTION_DONE) === Task::STATUS_DONE, 'done');
assert($task->getNewStatus(Task::ACTION_DENY) === Task::STATUS_FAIL, 'failed');

assert($task->getAvailableActions(1, Task::STATUS_NEW) === Task::ACTION_CANCEL, 'cancel');
assert($task->getAvailableActions(2, Task::STATUS_NEW) === Task::ACTION_RESPOND, 'respond');

assert($task->getAvailableActions(1, Task::STATUS_WAIT) === Task::ACTION_ACCEPT, 'accept');

assert($task->getAvailableActions(1, Task::STATUS_WORK) === Task::ACTION_DONE, 'done');
assert($task->getAvailableActions(2, Task::STATUS_WORK) === Task::ACTION_DENY, 'failed');

$mapStatus = $task->getMapStatus();
$mapAction = $task->getMapAction();
