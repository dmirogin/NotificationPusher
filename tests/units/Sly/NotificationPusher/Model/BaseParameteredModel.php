<?php

namespace tests\units\Sly\NotificationPusher\Model;

require_once __DIR__ . '/../../../../../vendor/autoload.php';

use mageekguy\atoum;
use Sly\NotificationPusher\Model\Device;

/**
 * BaseParameteredModel.
 *
 * @uses atoum\test
 * @author Cédric Dugat <cedric@dugat.me>
 */
class BaseParameteredModel extends atoum\test
{
    public function testMethods()
    {
        $this->if($object = new Device('Test', array('param' => 'test')))
            ->boolean($object->hasParameter('param'))
                ->isTrue()
            ->string($object->getParameter('param'))
                ->isEqualTo('test')

            ->boolean($object->hasParameter('notExist'))
                ->isFalse()
            ->variable($object->getParameter('notExist'))
                ->isNull()
            ->string($object->getParameter('renotExist', '12345'))
                ->isEqualTo('12345')

            ->when($object->setParameters(array('chuck' => 'norris')))
            ->boolean($object->hasParameter('chuck'))
                ->isTrue()
            ->string($object->getParameter('chuck'))
                ->isEqualTo('norris')

            ->when($object->setParameter('poney', 'powerful'))
            ->boolean($object->hasParameter('poney'))
                ->isTrue()
            ->string($object->getParameter('poney'))
                ->isEqualTo('powerful')
        ;
    }
}
