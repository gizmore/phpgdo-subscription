<?php
namespace GDO\Subscription;

use GDO\Core\GDO_Module;
use GDO\Core\GDT_Select;

final class GDT_SubscribeType extends GDT_Select
{

    public static array $SUBSCRIPTORS = [];

    public static function addSubscriptor(GDO_Module $module): void
    {
        self::$SUBSCRIPTORS[$module->getName()] = $module;
    }

    protected function __construct()
    {
        parent::__construct();
    }

    public function getChoices(): array
    {
        $choices = [$this->emptyVar => t('none')];
        $more = array_map(function (GDO_Module $m) {
            return $m->renderName();
        }, self::$SUBSCRIPTORS);
        return array_merge($choices, $more);
    }

}
