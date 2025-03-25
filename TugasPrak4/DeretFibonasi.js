function fibonacci(n) {
    let fiboSeries = [0, 1];
    for (let i = 2; i < n; i++) {
        fiboSeries.push(fiboSeries[i - 1] + fiboSeries[i - 2]);
    }
    return fiboSeries;
}

console.log(fibonacci(25)); // Cetak 25 angka pertama dari deret Fibonacci