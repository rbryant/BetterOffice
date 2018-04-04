BrowseHistory
=============

This Yii extension manages a history of the last visited pages.
Browsehistory memories a limited list of last visited pages (route + title).

## Requirements

* PHP 5 >= 5.1.0
* Yii 1.0

## Usage

First, unzip the archive into `protected/extensions/browsehistory/`, and change the file permissions.
Note: only `protected/extensions/browsehistory/models/Browsehistory.php` is used. The other files are for development purpose.

Add `'ext.browsehistory.models.Browsehistory'` in the `import` section of the configuration or use `Yii::import()` as in the following examples.

### Add a page

In a view, or in a controller, add a new page using:

~~~
[php]
Yii::import('ext.browsehistory.models.Browsehistory');
$maxNbOfRoutes = 20;
$history = Browsehistory::getInstance('session-key', $maxNbOfRoutes);
$history->push(array('/site/index', 'Homepage');
~~~

or using the default values

~~~
[php]
Yii::import('ext.browsehistory.models.Browsehistory');
$history = Browsehistory::getInstance();
$history->push(null, $this->pageTitle);
~~~

### Display the history

And the list can be displayed in a CMenu.
For example, I'm using it in the main application menu (the famous horizontal
menu) or in a CPortlet, in a vertical menu.

~~~
[php]
Yii::import('ext.browsehistory.models.Browsehistory');
$history = Browsehistory::getInstance();
$this->widget('zii.widgets.CMenu', array(
	'items'=>$history->items(),
));
~~~

or

~~~
[php]
$items = array(
	array('label'=>'Home',
		'url'=>array('/default/index'),
	)
);

// import and add items into a set of CMenu items
Yii::import('ext.browsehistory.models.Browsehistory');
$history = Browsehistory::getInstance();
$history->addItems($items);

// render the menu
$this->widget('zii.widgets.CMenu', array(
	'items'=>$items,
));
~~~
