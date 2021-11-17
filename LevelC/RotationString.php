<?php

namespace Hackathon\LevelC;

class RotationString
{
    /**
     * @TODO ! BAM
     *
     * @param $s1
     * @param $s2
     *
     * @return bool|int
     */
    public static function isRotation($s1, $s2)
    {
        if (strlen($s1) != strlen($s2))
            return false;
        for ($i = 0; $i < strlen($s2); $i++) {
            $substr1 = substr($s2, $i);
            $substr2 = substr($s2, 0, $i);
            if(RotationString::isSubString($s1, $substr1) !== false && RotationString::isSubString($s1, $substr2) !== false)
                return true;
        }
        return false;
    }

    public static function isSubString($s1, $s2)
    {
        $pos = strpos($s1, $s2);

        return $pos;
    }
}
