<?php

class Foo {

	private $field = 42;
	const VALUE = false;

	public function bar($arg) {
		return $this->field;
		$arg++;
	}

	private function priv() {
		return;
	}
}

// calling as static method
Foo::bar();

$obj = new Foo();

// required argument omitted
$obj->bar();

// to many arguments
$obj->bar('foo', 'bar');

// undefined constant
echo Foo::NOT_EXISTING_CONST;

// calling private method from outside the class
$obk->priv();
