<?php

declare(strict_types=1);

namespace App\Action;


class ActionFactory
{
    /**
     * @var array
     */
    private $actions = [];

    /**
     * @param string $action Имя экшена
     */
    public function addAction(string $action): void
    {
        $this->actions[] = $action;
    }

    /**
     * @return array
     */
    public function getActions(): array
    {
        return $this->actions;
    }
}
