\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\# NETWORK \#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#\#

  39 

  40 \# By default, if no "bind" configuration directive is specified, Redis listens

  41 \# for connections from all the network interfaces available on the server.

  42 \# It is possible to listen to just one or multiple selected interfaces using

  43 \# the "bind" configuration directive, followed by one or more IP addresses.

  44 \#

  45 \# Examples:

  47 \# bind 192.168.1.100 10.0.0.1

  48 \# bind 127.0.0.1 ::1

  49 \#

  50 \# ~~~ WARNING ~~~ If the computer running Redis is directly exposed to the

  51 \# internet, binding to all the interfaces is dangerous and will expose the

  52 \# instance to everybody on the internet. So by default we uncomment the

  53 \# following bind directive, that will force Redis to listen only into

  54 \# the IPv4 lookback interface address \(this means Redis will be able to

  55 \# accept connections only from clients running into the same computer it

  56 \# is running\).

  57 \#

  58 \# IF YOU ARE SURE YOU WANT YOUR INSTANCE TO LISTEN TO ALL THE INTERFACES

  59 \# JUST COMMENT THE FOLLOWING LINE.

  60 \# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

  61 \#bind 127.0.0.1

##### **  62 \#bind  192.168.1.108 127.0.0.1**

  63 \#bind 127.0.0.1



\# By default protected mode is enabled. You should disable it only if

  79 \# you are sure you want clients from other hosts to connect to Redis

  80 \# even if no authentication is configured, nor a specific set of interfaces

  81 \# are explicitly listed using the "bind" directive.

  82 \#protected-mode yes

##### **  83 protected-mode no**





