// Game Model
var model = {
    boardSize: 7,
    numShips: 3,
    shipLength: 1,//can be changed to more if you want so that the ships'length takes more cells
    shipsSunk: 0,
    //game's parameters

	ships: [
		{ locations: [0], hits: [""] },
		{ locations: [0], hits: [""] },
		{ locations: [0], hits: [""] }
	],//if you change the shipLength you also have to make the locations and the hits so that they have the needed ammount of elements

	fire: function(guess) { //this is the fire button function

		for(var i = 0; i < this.numShips; i++) {
			var ship = this.ships[i];
			var index = ship.locations.indexOf(guess);

			// check if a ship location has already been hit
			if ( ship.hits[index] === "hit" ) {
				view.displayMessage("Oops, you already hit that location");
				return true;//this is if you hit the same location twice or more
			} else if ( index >= 0 ) {
				ship.hits[index] = "hit";
				view.displayHit(guess);
				view.displayMessage("HIT!");//this else if is if you hit a battleship which is used if you play the 3 shiplength version

				if ( this.isSunk(ship) ) {
					view.displayMessage("You sank my battleship!");
					this.shipsSunk++;//and this is if you completely sink the battleship
				}
				return true;
			}
			$('#guessInput').focus();
		}
		view.displayMiss(guess);
		view.displayMessage("You Missed");
		return false;
	},

	isSunk: function(ship) { //this here checks if the ship is sunk
		for (var i = 0; i < this.shipLength; i++) {
			if (ship.hits[i] !== "hit") {//this is if it's not hit or in the 3 length version, if none of it's parts are hit
				return false;
			}
		}	$('#guessInput').focus();
	
		return true;
	},

	generateShipLocations: function() { //this function fills the ship.locations
		var locations;
		for (var i = 0; i < this.numShips; i++) {
		do {
				locations = this.generateShip();
		} while (this.collision(locations));
			this.ships[i].locations = locations;
		}
		console.log("Ships array: ");
		console.log(this.ships);
	},

	generateShip: function() {
		var direction = Math.floor(Math.random() * 2);
		var row, col;

		if (direction === 1) { // horizontal
			row = Math.floor(Math.random() * this.boardSize);
			col = Math.floor(Math.random() * (this.boardSize - this.shipLength + 1));
		} else { // vertical
			row = Math.floor(Math.random() * (this.boardSize - this.shipLength + 1));
			col = Math.floor(Math.random() * this.boardSize);
		}

		var newShipLocations = [];

		for (var i = 0; i < this.shipLength; i++) {
			if (direction === 1) {
				newShipLocations.push(row + "" + (col + i));
			} else {
				newShipLocations.push((row + i) + "" + col);
			}
		}
		return newShipLocations; // this one here is to actually generate where the ship will be
	},

	collision: function(locations) { // and this one makes sure the ships are on different spots
		for (var i = 0; i < this.numShips; i++) {
			var ship = this.ships[i];
			for (var j = 0; j < locations.length; j++) {
				if (ship.locations.indexOf(locations[j]) >= 0) {
					return true;
				}
			}
		}
		return false;
	}
};

var view = {
	displayMessage: function(msg) {
		var messageArea = document.getElementById("messageArea");
		messageArea.innerHTML = msg;
	},
	displayHit: function(location) {
		var cell = document.getElementById(location);
		cell.setAttribute("class", "hit");
	},
	displayMiss: function(location) {
		var cell = document.getElementById(location);
		cell.setAttribute("class", "miss");
	}//this one is for the different messages
};

var controller = {
	guesses: 0,

	processGuess: function(guess) {
		var location = parseGuess(guess);

		if (location) {
			this.guesses++;
			var hit = model.fire(location);
			if (hit && model.shipsSunk === model.numShips) {
				view.displayMessage("You sank all my battleships, in " + this.guesses + " guesses");
			}
		}
	}
};

// helper function to parse a guess from the user
function parseGuess(guess) {
	var alphabet = ["A", "B", "C", "D", "E", "F", "G"];

	if (guess === null || guess.length !== 2) {
		alert("Oops, please enter a letter and a number on the board.");
	} else {
		var firstChar = guess.charAt(0);
		var row = alphabet.indexOf(firstChar);
		var column = guess.charAt(1);
		if (isNaN(row) || isNaN(column)) {
			alert("Oops, that isn't on the board.");
		} else if (row < 0 || row >= model.boardSize || column < 0 || column >= model.boardSize) {
				alert("Oops, that's off the board!");
		} else {
			return row + column;
		}
	}
	return null;
}

// event handlers
function handleFireButton() {
	var guessInput = document.getElementById("guessInput");
	var guess = guessInput.value.toUpperCase();
	controller.processGuess(guess);
	guessInput.value = "";
}

function handleKeyPress(e) {
	var fireButton = document.getElementById("fireButton");
	// in IE9 and earlier, the event object doesn't get passed
	// to the event handler correctly, so we use window.event instead.
	e = e || window.event;
	if (e.keyCode === 13) {
		fireButton.click();
		return false;
	}
}

// init - called when the page has completed loading
window.onload = init;

function init() {
	// Fire! button onclick handler
	var fireButton = document.getElementById("fireButton");
	fireButton.onclick = handleFireButton;
	// handle "return" key press
	var guessInput = document.getElementById("guessInput");
	guessInput.onkeypress = handleKeyPress;
	// place the ships on the game board
	model.generateShipLocations();
}