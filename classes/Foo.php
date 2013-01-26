<?php

class Foo {
	public function bar() {
		$bar = new Bar; //static dependency
		return $bar->value();
	}
}
