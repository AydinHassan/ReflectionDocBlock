<?php

declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection\DocBlock\Tags\Factory;

use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Types\Context;
use phpDocumentor\Reflection\Types\String_;

final class ParamFactoryTest extends TagFactoryTestCase
{
    /**
     * @covers \phpDocumentor\Reflection\DocBlock\Tags\Factory\ParamFactory::__construct
     * @covers \phpDocumentor\Reflection\DocBlock\Tags\Factory\ParamFactory::create
     * @covers \phpDocumentor\Reflection\DocBlock\Tags\Factory\ParamFactory::supports
     */
    public function testParamIsCreated(): void
    {
        $ast = $this->parseTag('@param string $var');
        $factory = new ParamFactory($this->giveTypeResolver(), $this->givenDescriptionFactory());
        $context = new Context('global');

        self::assertTrue($factory->supports($ast, $context));
        self::assertEquals(
            new Param(
                'var',
                new String_(),
                false,
                new Description(''),
                false
            ),
            $factory->create($ast, $context)
        );
    }
}
