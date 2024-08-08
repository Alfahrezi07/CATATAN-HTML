



# Project_Dart

## Kode Program 


```Dart

void main() {
  // Operator
  int a = 10;
  int b = 5;
  int sum = a + b;
  int kali = a * b;
  print('Sum: $sum');
  print('Kali: $kali');

  // List
  List<int> numbers = [1, 2, 3, 4, 5];
  print('List: $numbers');

  // Percabangan (if-else)
  if (sum > 10) {
    print('Jumlahnya lebih besar dari 10');
  } else {
    print('Jumlahnya 10 atau kurang dari 10');
  }

  // Perulangan (for loop)
  for (int i = 0; i < numbers.length; i++) {
    print('Nomor di index $i: ${numbers[i]}');
  }

  // Function
  void greet(String name) {
    print('Hello, $name!');
  }

  greet('Farel');

  // Function Return Value
  int square(int x) {
    return x * x;
  }

  int result = square(4);
  print('Kuadrat dari 4 adalah $result');

  // Scope
  int outerVariable = 10;

  void outerFunction() {
    int innerVariable = 20;

    void innerFunction() {
      print('Outer Variable: $outerVariable');
      print('Inner Variable: $innerVariable');
    }

    innerFunction();
  }

  outerFunction();

  // Closure
  Function makeAdder(int a) {
    return (int i) => a + i;
  }

  Function add2 = makeAdder(2);
  Function add5 = makeAdder(5);

  print(add2(3)); // 5
  print(add5(3)); // 8
}

```






