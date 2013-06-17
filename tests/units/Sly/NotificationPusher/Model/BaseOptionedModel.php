<?php

namespace tests\units\Sly\NotificationPusher\Model;

require_once __DIR__ . '/../../../../../vendor/autoload.php';

use mageekguy\atoum;
use Sly\NotificationPusher\Model\Message;

/**
 * BaseOptionedModel.
 *
 * @uses atoum\test
 * @author Cédric Dugat <cedric@dugat.me>
 */
class BaseOptionedModel extends atoum\test
{
    public function testMethods()
    {
        $this->if($object = new Message('Test', array('param' => 'test')))
            ->boolean($object->hasOption('param'))
                ->isTrue()
            ->string($object->getOption('param'))
                ->isEqualTo('test')

            ->boolean($object->hasOption('notExist'))
                ->isFalse()
            ->variable($object->getOption('notExist'))
                ->isNull()
            ->string($object->getOption('renotExist', '12345'))
                ->isEqualTo('12345')

            ->when($object->setOptions(array('chuck' => 'norris')))
            ->boolean($object->hasOption('chuck'))
                ->isTrue()
            ->string($object->getOption('chuck'))
                ->isEqualTo('norris')

            ->when($object->setOption('poney', 'powerful'))
            ->boolean($object->hasOption('poney'))
                ->isTrue()
            ->string($object->getOption('poney'))
                ->isEqualTo('powerful')
        ;
    }
}
