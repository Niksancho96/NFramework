<?php
	Class Form {

		// Initialy opens a form
		public function openForm($name = NULL, $target = NULL, $action = NULL, $enctype = NULL, $method) {
			echo "<form name='" . $name . "' method='" . $method . "' action='" . $action . "' target='" . $target . "' enctype='" . $enctype . "'>";
		}

		// Add an ordinary field
		public function addField($type, $name, $value = NULL, $placeholder = NULL) {
			echo "<input type='" . $type . "' name='" . $name . "' value='" . $value . "' placeholder='" . $placeholder . "' />";
		}

		// Add a drop down menu
		public function openDropDownList($name, $required = NULL) {
			echo "<select name='" . $name . "' required='" . $required . "'";
		}

		// Add options to drop down menu
		public function addOption($data, $value, $label = NULL) {
			echo "<option value='" . $value . "' label='" . $label . "'>" . $data . "</option>";
		}

		// Close drop down menu
		public function closeDropDownList() {
			echo "</select>";
		}

		// Add textarea to the form
		public function addTextArea($name, $rows = NULL, $cols = NULL, $value = NULL) {
			echo "<textarea name='" . $name . "' rows='" . $rows . "' cols='" . $cols . "'>" . $value . "</textarea>";
		}

		// Close form
		public function closeForm() {
			echo "</form>";
		}
	}