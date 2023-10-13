$(document).ready(function() {
    // hexadecimal to decimal
    function hexToDec(hex) {
        return parseInt(hex, 16);
    }

    // manual dec to hexa conversion
    function decToHexManual(dec) {
        let hex = "";
        while (dec) {
            let remainder = dec % 16;
            dec = Math.floor(dec / 16);
            if (remainder < 10) {
                hex = remainder.toString() + hex;
            } else {
                // A = 65, B = 66, C = 67, D = 68, E = 69, F = 70
                // code ascii
                hex = String.fromCharCode(remainder + 55) + hex;
            }
        }
    }

    // decimal to hexadecimal
    function decToHex(dec) {
        return dec.toString(16);
    }

    //error handling
    const value = parseFloat(prompt("Enter a decimal number: "));

    //handling error for non-decimal numbers
    if (isNaN(value)) {
        alert("Please enter a valid decimal number");
    } 
    //handling error for negative numbers
    else if (value < 0) {
        alert("Please enter a positive decimal number");
    }
    //handling error for decimal numbers with decimal places
    else if (value % 1 != 0) {
        alert("Please enter a decimal number without decimal places");
    }
    //conversion
    else {
        alert(`${value} en hexadecimal vaut ${decToHex(value)}`);
    }
});