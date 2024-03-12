<?php

namespace App\Console\Commands;

use App\Classes\Chicken;
use App\Classes\Cow;
use App\Classes\Farm;
use Illuminate\Console\Command;

class FarmLife extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'farm:life';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Работа фермы';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Создаем ферму
        $farm = new Farm();

        // Добавляем 10 коров
        for ($i = 1; $i <= 10; $i++) {
            $cow = new Cow("COW-" . $i);
            $farm->addAnimal($cow);
        }

        // Добавляем 20 кур
        for ($i = 1; $i <= 20; $i++) {
            $chicken = new Chicken("CHICKEN-" . $i);
            $farm->addAnimal($chicken);
        }

        // Выводим информацию о количестве животных на ферме
        $this->WeDisplayInformationAboutTheNumberOfAnimals($farm);

        // Добавляем еще 5 кур и 1 корову
        for ($i = 1; $i <= 5; $i++) {
            $chicken = new Chicken("CHICKEN-NEW-" . $i);
            $farm->addAnimal($chicken);
        }
        $cow = new Cow("COW-NEW-1");
        $farm->addAnimal($cow);

        // Выводим информацию о количестве животных на ферме после покупки
        $this->WeDisplayInformationAboutTheNumberOfAnimals($farm);

    }

    /**
     * Вывод информации о количестве животных на ферме
     * @param Farm $farm
     * @return void
     */
    private function WeDisplayInformationAboutTheNumberOfAnimals(Farm $farm): void
    {
        echo "Количество коров на ферме: " . count(array_filter($farm->getAnimals(), function ($animal) {
                return $animal instanceof Cow;
            })) . PHP_EOL;
        echo "Количество кур на ферме: " . count(array_filter($farm->getAnimals(), function ($animal) {
                return $animal instanceof Chicken;
            })) . PHP_EOL;

        // Производим сбор продукции 7 раз
        for ($week = 1; $week <= 7; $week++) {
            $totalMilk = 0;
            $totalEggs = 0;

            foreach ($farm->getAnimals() as $animal) {
                if ($animal instanceof Cow) {
                    $totalMilk += $animal->collectProduce();
                } elseif ($animal instanceof Chicken) {
                    $totalEggs += $animal->collectProduce();
                }
            }

            echo "Неделя " . $week . ": Собрано молока - " . $totalMilk . " л, яиц - " . $totalEggs . " шт." . PHP_EOL;
        }
    }
}
