# Doctor When: Installation and Usage

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
