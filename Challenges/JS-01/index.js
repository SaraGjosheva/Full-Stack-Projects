// Exercise 1
console.log("Exercise 1:");

let number = 12;

function checkNumber(number) {
  if (number % 2 === 0) {
    console.log(`The Number ${number} is even.`);
  } else {
    console.log(`The Number ${number} is not even.`);
  }
}

checkNumber(number);

// Exercise 2
console.log("Exercise 2:");

function checkEvenAndDivisibleBy(n) {
  for (let i = 10; i <= 100; i++) {
    if (i % 2 === 0 && i % n === 0) {
      console.log(i);
    }
  }
}

checkEvenAndDivisibleBy(12);

// Exercise 3 - first approach
console.log("Exercise 3:");

let n1 = 13;
let n2 = 15;
let n3 = 20;

function minNumber(n1, n2, n3) {
  let numbers = [n1, n2, n3];
  let min = numbers[0];

  numbers.forEach((number) => {
    if (number < min) {
      min = number;
    }
  });

  return min;
}

function maxNumber(n1, n2, n3) {
  let numbers = [n1, n2, n3];
  let max = numbers[0];

  numbers.forEach((number) => {
    if (number > max) {
      max = number;
    }
  });

  return max;
}

function primeNumber(number) {
  let isPrime = true;

  if (number === 1) {
    console.log(`1 is neither prime nor composite number.`);
  } else if (number > 1) {
    for (let i = 2; i < number; i++) {
      if (number % i == 0) {
        isPrime = false;
        break;
      }
    }

    if (isPrime) {
      return `${number} is a prime`;
    } else {
      return `${number} is not a prime`;
    }
  } else {
    return `The number is not a prime number.`;
  }
}

function checkMinMaxPrime1(n1, n2, n3) {
  let min = minNumber(n1, n2, n3);
  let max = maxNumber(n1, n2, n3);
  let minPrime = primeNumber(min);
  let maxPrime = primeNumber(max);

  console.log(
    `The smallest number ${minPrime}, the largest number ${maxPrime}.`
  );
}

checkMinMaxPrime1(n1, n2, n3);

// Exercise 3 - second approach
console.log("Exercise 3:");

function isPrime(number) {
  if (number < 2) {
    return false;
  }

  // Math.sqrt() - calculates the square root of a number.
  for (let i = 2; i <= Math.sqrt(number); i++) {
    if (number % i === 0) {
      return false;
    }
  }
  return true;
}

function checkMinMaxPrime2(n1, n2, n3) {
  const numbers = [n1, n2, n3];
  const min = Math.min(...numbers);
  const max = Math.max(...numbers);

  console.log(`Smallest number - ${min}; Largest number - ${max}`);

  const minPrimeMessage = isPrime(min)
    ? `${min} is a prime`
    : `${min} is not a prime`;

  const maxPrimeMessage = isPrime(max)
    ? `${max} is a prime`
    : `${max} is not a prime`;

  console.log(
    `The smallest number ${minPrimeMessage}, the largest number ${maxPrimeMessage}.`
  );
}

checkMinMaxPrime2(n1, n2, n3);
