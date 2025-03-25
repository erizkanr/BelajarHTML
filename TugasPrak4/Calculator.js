const calculator = (operator, ...numbers) => {
    switch (operator) {
        case '+':
            return numbers.reduce((a, b) => a + b, 0);
        case '-':
            return numbers.reduce((a, b) => a - b);
        case '*':
            return numbers.reduce((a, b) => a * b, 1);
        case '/':
            return numbers.reduce((a, b) => a / b);
        case '%':
            return numbers.reduce((a, b) => a % b);
        default:
            return "Operator tidak valid";
    }
};

console.log(calculator('+', 83, 10, 15));
console.log(calculator('-', 20, 45, 3));
console.log(calculator('*', 2, 10, 43)); 
console.log(calculator('/', 60, 30, 5)); 
console.log(calculator('%', 10, 13));