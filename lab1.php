<?php

// Завдання 1. Видалення всіх парних чисел із масиву.
$task1Array = [];
for ($i = 0; $i < 15; $i++) {
    $task1Array[] = rand(1, 100);
}
$task1Filtered = array_values(array_filter($task1Array, function ($num) {
    return $num % 2 !== 0;
}));

echo "1) Початковий масив: " . implode(', ', $task1Array) . PHP_EOL;
echo "1) Після видалення парних: " . implode(', ', $task1Filtered) . PHP_EOL . PHP_EOL;

// Завдання 2. Перевірити, чи масив є паліндромом.
$task2Input = $_POST['task2_array'] ?? '';
$task2Array = [];
if (trim($task2Input) !== '') {
    $task2Parts = explode(',', $task2Input);
    foreach ($task2Parts as $part) {
        $value = trim($part);
        if ($value !== '' && is_numeric($value)) {
            $task2Array[] = (int)$value;
        }
    }
}
$task2IsPalindrome = !empty($task2Array) && ($task2Array === array_reverse($task2Array));
echo "2) Введений масив: " . (empty($task2Array) ? 'немає коректних даних' : implode(', ', $task2Array)) . PHP_EOL;
echo "2) Результат: " . ($task2IsPalindrome ? 'масив є паліндромом' : 'масив НЕ є паліндромом') . PHP_EOL . PHP_EOL;

// Завдання 3. Порахувати кількість парних чисел у масиві.
$task3Input = $_POST['task3_array'] ?? '';
$task3Array = [];
if (trim($task3Input) !== '') {
    $task3Parts = explode(',', $task3Input);
    foreach ($task3Parts as $part) {
        $value = trim($part);
        if ($value !== '' && is_numeric($value)) {
            $task3Array[] = (int)$value;
        }
    }
}
$task3EvenCount = 0;
foreach ($task3Array as $num) {
    if ($num % 2 === 0) {
        $task3EvenCount++;
    }
}
echo "3) Введений масив: " . (empty($task3Array) ? 'немає коректних даних' : implode(', ', $task3Array)) . PHP_EOL;
echo "3) Кількість парних елементів: $task3EvenCount" . PHP_EOL . PHP_EOL;

// Завдання 4. Знайти числа кратні 4 у діапазоні.
$task4Sum = 0;
for ($i = 100; $i <= 200; $i++) {
    if ($i % 4 === 0) {
        $task4Sum += $i;
    }
}
echo "4) Сума чисел від 100 до 200, кратних 4: $task4Sum" . PHP_EOL . PHP_EOL;

// Завдання 5. Пошук другого за величиною елемента в масиві.
$task5Array = [];
for ($i = 0; $i < 10; $i++) {
    $task5Array[] = rand(0, 50);
}
$task5Unique = array_values(array_unique($task5Array));
rsort($task5Unique);
$task5SecondMax = count($task5Unique) >= 2 ? $task5Unique[1] : null;
echo "5) Масив: " . implode(', ', $task5Array) . PHP_EOL;
echo "5) Друге за величиною число: " . ($task5SecondMax !== null ? $task5SecondMax : 'неможливо визначити (усі елементи однакові)') . PHP_EOL . PHP_EOL;

// Завдання 6. Підрахунок добутку непарних чисел масиву.
$task6Array = [];
for ($i = 0; $i < 15; $i++) {
    $task6Array[] = rand(1, 100);
}
$task6Product = 1;
$task6HasOdd = false;
foreach ($task6Array as $num) {
    if ($num % 2 !== 0) {
        $task6Product *= $num;
        $task6HasOdd = true;
    }
}
echo "6) Масив: " . implode(', ', $task6Array) . PHP_EOL;
echo "6) Добуток непарних чисел: " . ($task6HasOdd ? $task6Product : 'у масиві немає непарних чисел') . PHP_EOL . PHP_EOL;

// Завдання 7. Перетворення дати у текстовий формат.
$task7Input = $_POST['task7_date'] ?? '';
$task7Months = [
    1 => 'січня', 2 => 'лютого', 3 => 'березня', 4 => 'квітня',
    5 => 'травня', 6 => 'червня', 7 => 'липня', 8 => 'серпня',
    9 => 'вересня', 10 => 'жовтня', 11 => 'листопада', 12 => 'грудня'
];
$task7Output = 'невірний формат або некоректна дата';
if (preg_match('/^(\d{1,2})\.(\d{1,2})\.(\d{4})$/', trim($task7Input), $m)) {
    $day = (int)$m[1];
    $month = (int)$m[2];
    $year = (int)$m[3];
    if (checkdate($month, $day, $year)) {
        $task7Output = $day . ' ' . $task7Months[$month] . ' ' . $year . ' року';
    }
}
echo "7) Ввід дати: " . ($task7Input !== '' ? $task7Input : 'немає даних') . PHP_EOL;
echo "7) Результат: $task7Output" . PHP_EOL . PHP_EOL;

// Завдання 8. Знайти кількість елементів, кратних 100 у масиві.
$task8Array = [];
for ($i = 0; $i < 20; $i++) {
    $task8Array[] = rand(50, 500);
}
$task8Count = 0;
foreach ($task8Array as $num) {
    if ($num % 100 === 0) {
        $task8Count++;
    }
}
echo "8) Масив: " . implode(', ', $task8Array) . PHP_EOL;
echo "8) Кількість елементів, кратних 100: $task8Count" . PHP_EOL . PHP_EOL;

// Завдання 9. Вивід чисел, що діляться на 5, та обчислення їхньої суми.
$task9Numbers = [];
$task9Sum = 0;
for ($i = 20; $i <= 45; $i++) {
    if (fmod($i, 5) == 0.0) {
        $task9Numbers[] = $i;
        $task9Sum += $i;
    }
}
echo "9) Числа від 20 до 45, що діляться на 5: " . implode(', ', $task9Numbers) . PHP_EOL;
echo "9) Їх сума: $task9Sum" . PHP_EOL . PHP_EOL;

// Завдання 10. Симуляція світлофора за хвилиною години.
$task10Input = $_POST['task10_minute'] ?? '';
$task10Output = 'введіть число від 1 до 60';
if (is_numeric($task10Input)) {
    $minute = (int)$task10Input;
    if ($minute >= 1 && $minute <= 60) {
        $cycleMinute = ($minute - 1) % 5; // цикл 3 хв зелений + 2 хв червоний
        $task10Output = ($cycleMinute <= 2) ? 'зелений' : 'червоний';
    } else {
        $task10Output = 'помилка: хвилина має бути в діапазоні 1..60';
    }
}
echo "10) Введена хвилина: " . ($task10Input !== '' ? $task10Input : 'немає даних') . PHP_EOL;
echo "10) Сигнал світлофора: $task10Output" . PHP_EOL;
