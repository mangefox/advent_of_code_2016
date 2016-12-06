<?php
declare(strict_types=1);

class Day6 {
    use DayTrait;

    public function execute()
    {

        $messageData = $this->buildMessageData();

        $this->setResult1($this->getMessage($messageData))
             ->setResult2($this->getMessage($messageData, true));

    }

    private function getMessage(array $array, bool $ascending = false): string
    {
        $message = '';

        foreach($array as &$row) {
            if($ascending) {
                asort($row);
            } else {
                arsort($row);
            }
            $message .= current(array_flip($row));
        }

        return $message;
    }

    private function buildMessageData(): array
    {
        $input = $this->getFile();
        $messageData = [];

        foreach($input as $row) {
            $letters = str_split(trim($row));

            foreach($letters as $i => $letter) {
                if(!isset($messageData[$i])) {
                    $messageData[$i] = [];
                }

                if(!isset($messageData[$i][$letter])) {
                    $messageData[$i][$letter] = 0;
                }

                $messageData[$i][$letter] += 1;
            }
        }

        return $messageData;
    }

}