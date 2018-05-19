<?php

namespace Utarwyn\Jenkins\Entity;

use ReflectionClass;

class BuildResult
{
    const ABORTED = "ABORTED";

    const FAILURE = "FAILURE";

    const RUNNING = "RUNNING";

    const SUCCESS = "SUCCESS";

    const UNSTABLE = "UNSTABLE";

    const WAITING = "WAITING";

    /**
     * @param $result
     * @return null|BuildResult
     * @throws \ReflectionException
     */
    public static function fromResult($result)
    {
        $refl = new ReflectionClass(get_class());
        $arr = array_flip($refl->getConstants());

        return $arr[$result];
    }
}
