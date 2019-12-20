Light_Database
===========
2019-07-22 -> 2019-12-20



A database service for the [Light](https://github.com/lingtalfi/Light) framework.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Database
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages:
    - [conception notes](https://github.com/lingtalfi/Light_Database/blob/master/personal/mydoc/pages/conception-notes.md)
    - [events](https://github.com/lingtalfi/Light_Database/blob/master/personal/mydoc/pages/events.md)

- [Services](#services)





Services
=========


This plugin provides the following services:

- database  (returns a LightDatabaseService)


The database service provides you access to a configured instance of the [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md), which extends the
[SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper) class. 



Here is the content of the service configuration file:

```yaml
database:
    instance: Ling\Light_Database\Service\LightDatabaseService
    methods:
        init:
            settings: []
        setContainer:
            container: @container()


# example of settings
#$database.methods.init.settings:
#    pdo_database: my_database
#    pdo_user: my_user
#    pdo_pass: my_pass
#    pdo_options:
#        persistent: true
#        errmode: exception
#        initCommand: SET NAMES 'UTF8'





```










History Log
=============

- 1.6.0 -- 2019-12-20

    - add LightDatabasePdoWrapper->disableMicroPermissions and enableMicroPermissions methods
    
- 1.5.2 -- 2019-12-19

    - fix functional typo in LightDatabasePdoWrapper->onSuccess: missing prefix in dispatched event

- 1.5.1 -- 2019-12-19

    - add links to pages in the README.md
    
- 1.5.0 -- 2019-12-19

    - add useMicroPermission system
    
- 1.4.1 -- 2019-12-17

    - update documentation events page
    
- 1.4.0 -- 2019-12-16

    - add LightDatabasePdoWrapper->onSuccess with events system
    
- 1.3.0 -- 2019-11-22

    - add LightDatabaseService
    
- 1.2.1 -- 2019-09-17

    - add comment in the README.md
    
- 1.2.0 -- 2019-08-14

    - remove LightDatabasePdoWrapperAwareInterface
    
- 1.1.0 -- 2019-08-14

    - add LightDatabasePdoWrapperAwareInterface

- 1.0.2 -- 2019-07-23

    - fix typo
    
- 1.0.1 -- 2019-07-22

    - update documentation for docTools
    
- 1.0.0 -- 2019-07-22

    - initial commit