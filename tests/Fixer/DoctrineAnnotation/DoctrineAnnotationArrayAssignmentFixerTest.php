<?php

declare(strict_types=1);

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace PhpCsFixer\Tests\Fixer\DoctrineAnnotation;

use PhpCsFixer\Tests\AbstractDoctrineAnnotationFixerTestCase;

/**
 * @internal
 *
 * @covers \PhpCsFixer\AbstractDoctrineAnnotationFixer
 * @covers \PhpCsFixer\Doctrine\Annotation\DocLexer
 * @covers \PhpCsFixer\Fixer\DoctrineAnnotation\DoctrineAnnotationArrayAssignmentFixer
 *
 * @extends AbstractDoctrineAnnotationFixerTestCase<\PhpCsFixer\Fixer\DoctrineAnnotation\DoctrineAnnotationArrayAssignmentFixer>
 *
 * @phpstan-import-type _AutogeneratedInputConfiguration from \PhpCsFixer\Fixer\DoctrineAnnotation\DoctrineAnnotationArrayAssignmentFixer
 */
final class DoctrineAnnotationArrayAssignmentFixerTest extends AbstractDoctrineAnnotationFixerTestCase
{
    /**
     * @param _AutogeneratedInputConfiguration $configuration
     *
     * @dataProvider provideFixCases
     */
    public function testFix(string $expected, ?string $input = null, array $configuration = []): void
    {
        $this->fixer->configure($configuration);
        $this->doTest($expected, $input);
    }

    /**
     * @return iterable<int, array{0: string, 1?: null|string}>
     */
    public static function provideFixCases(): iterable
    {
        $commentCases = [
            ['
/**
 * @Foo
 */',
            ],
            ['
/**
 * @Foo()
 */',
            ],
            ['
/**
 * @Foo(bar="baz")
 */',
            ],
            [
                '
/**
 * @Foo({bar="baz"})
 */',
                '
/**
 * @Foo({bar:"baz"})
 */',
            ],
            [
                '
/**
 * @Foo({bar = "baz"})
 */',
                '
/**
 * @Foo({bar : "baz"})
 */',
            ],
            ['
/**
 * See {@link https://help Help} or {@see BarClass} for details.
 */',
            ],
        ];

        yield from self::createTestCases($commentCases);

        yield from self::createTestCases($commentCases, ['operator' => '=']);

        yield [
            '<?php

/**
* @see \User getId()
*/
',
        ];

        yield [
            '<?php

/**
* @see \User getId()
*/
',
            null,
            ['operator' => '='],
        ];

        yield from self::createTestCases(
            [
                ['
/**
 * @Foo
 */',
                ],
                ['
/**
 * @Foo()
 */',
                ],
                [
                    '
/**
 * @Foo(bar:"baz")
 */',
                ],
                [
                    '
/**
 * @Foo({bar:"baz"})
 */',
                    '
/**
 * @Foo({bar="baz"})
 */',
                ],
                [
                    '
/**
 * @Foo({bar : "baz"})
 */',
                    '
/**
 * @Foo({bar = "baz"})
 */',
                ],
                [
                    '
/**
 * @Foo(foo="bar", {bar:"baz"})
 */',
                    '
/**
 * @Foo(foo="bar", {bar="baz"})
 */',
                ],
                ['
/**
 * See {@link https://help Help} or {@see BarClass} for details.
 */'],
            ],
            ['operator' => ':']
        );
    }

    /**
     * @dataProvider provideFix81Cases
     *
     * @requires PHP 8.1
     */
    public function testFix81(string $expected, ?string $input = null): void
    {
        $this->doTest($expected, $input);
    }

    /**
     * @return iterable<int, array{string, string}>
     */
    public static function provideFix81Cases(): iterable
    {
        yield [
            '<?php class FooClass{
    /**
     * @Foo({bar = "baz"})
     */
    private readonly Foo $foo;
}',
            '<?php class FooClass{
    /**
     * @Foo({bar : "baz"})
     */
    private readonly Foo $foo;
}',
        ];

        yield [
            '<?php class FooClass{
    /**
     * @Foo({bar = "baz"})
     */
    readonly private Foo $foo;
}',
            '<?php class FooClass{
    /**
     * @Foo({bar : "baz"})
     */
    readonly private Foo $foo;
}',
        ];

        yield [
            '<?php class FooClass{
    /**
     * @Foo({bar = "baz"})
     */
    readonly Foo $foo;
}',
            '<?php class FooClass{
    /**
     * @Foo({bar : "baz"})
     */
    readonly Foo $foo;
}',
        ];
    }

    /**
     * @dataProvider provideFix84Cases
     *
     * @requires PHP 8.4
     */
    public function testFix84(string $expected, ?string $input = null): void
    {
        $this->doTest($expected, $input);
    }

    /**
     * @return iterable<string, array{string, string}>
     */
    public static function provideFix84Cases(): iterable
    {
        yield 'asymmetric visibility' => [
            <<<'PHP'
                <?php class Entity {
                    /**
                     * @Foo({foo = "foo"})
                     */
                    public public(set) Foo $foo;
                    /**
                     * @Bar({bar = "bar"})
                     */
                    public protected(set) Bar $bar;
                    /**
                     * @Baz({baz = "baz"})
                     */
                    protected private(set) Baz $baz;
                }
                PHP,
            <<<'PHP'
                <?php class Entity {
                    /**
                     * @Foo({foo : "foo"})
                     */
                    public public(set) Foo $foo;
                    /**
                     * @Bar({bar : "bar"})
                     */
                    public protected(set) Bar $bar;
                    /**
                     * @Baz({baz : "baz"})
                     */
                    protected private(set) Baz $baz;
                }
                PHP,
        ];
    }
}
