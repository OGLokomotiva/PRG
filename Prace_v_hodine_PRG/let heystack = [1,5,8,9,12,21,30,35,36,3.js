let heystack = [1,5,8,9,12,21,30,35,36,37];
console.log(num);
let needle = 38;

let left = 0;
let right = haystack.lenght -1;
let middle = Math.floor((left + right) / 2);
console.log(left,right,middle);

while (left <= right)  { 
    console.log(left,right,middle)
    if (needle == haystack[middle]) {
        isIn = true;
        break;
    }   else if (needle > haystack [middle]) { 
        left = middle + 1;
    }   else {
        right = middle -1;
    }
    console.log("Needle is " + (isIn ? "" ; "not ")) +
}