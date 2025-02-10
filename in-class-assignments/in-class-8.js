console.log(1 + '7')
// Output is 17. This is due to type coercion which automatically converts values from one data type to a different data type when necessary.

console.log(Number(true))
//Output is 1 as the Number() function is run as true. In javascript, true is converted to 1

console.log(Number(false))
// Output is 0 as the Number() function is ran as false. In javascript, false is converted to 0.

console.log(Boolean(0))
// Output is false. In javascript, zero is viewed as false.

console.log(Boolean(1))
//Output is true. In javascript, non-zero numbers are viewed as true.

console.log(Boolean("0"))
//Output is true. In javascript, a non-empty string is seen as true.