Codeigniter Notes
=================

URL Helper
----------

Example url:

::

 http://dev.example.com/search/type/aa/bb/cc

::

 # echo base_url();
 http://dev.example.com/

::

 # echo uri_string();
 search/type/a/b/c

::

 # echo $this->uri->segment(1);
 search

::

 # echo $this->uri->segment(2);
 type

::

 # echo $this->uri->segment(3);
 aa



.. toctree::
   codeigniter
   :maxdepth: 2

Indices and tables
==================

* :ref:`genindex`
* :ref:`modindex`
* :ref:`search`

