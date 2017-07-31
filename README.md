# Doctor When: Temporal cleanup agent (experimental)

`DoctorWhen` is a CiviCRM extension which analyzes and fixes discrepancies in timestamps and datetimes.

## Installation

```
## Navigate to your extension folder
$ cv path -x.
/srv/buildkit/build/dmaster/sites/default/files/civicrm/ext
$ cd /srv/buildkit/build/dmaster/sites/default/files/civicrm/ext/doctorwhen

## Clone the repo
$ git clone https://github.com/civicrm/org.civicrm.doctorwhen

## Enable the extension
$ cv en doctorwhen
```

## Usage (Web)

Navigate to `civicrm/doctorwhen?reset=1`, e.g.

```
$ cv url civicrm/doctorwhen?reset=1
"http://dcase.l/civicrm/doctorwhen?reset=1"
$ cv url civicrm/doctorwhen?reset=1 --open
```

## Usage (CLI)

You can execute the full list of DoctorWhen tasks by calling the `DoctorWhen.run` API, e.g.

```
cv api DoctorWhen.run tasks=*
```

## Usage (PHP)

You can execute the full list of DoctorWhen tasks by calling the `DoctorWhen.run` API, e.g.

```php
civicrm_api3('DoctorWhen', 'run', array(
  'tasks' => '*',
));
```

## Development: Add a new task

`DoctorWhen` supports timestamp migration for activities and cases. However,
it's anticipated that several other changes will be appropriate (such as
converting `DATETIME` columns to `TIMESTAMP`).

To add a new task:
 * Copy `CRM/DoctorWhen/Cleanups/Example.php` to a new file (eg `CRM/DoctorWhen/Cleanups/MyTask.php`).
 * Edit the new file. Update the class name and the title. Consider the examples in the  `enqueue()` function; then rewrite them to do something more useful.
 * Edit `CRM/DoctorWhen/Cleanups.php`. In the `__construct()` function, add a record for the new class.
