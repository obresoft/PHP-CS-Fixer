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

namespace PhpCsFixer\Tests\Fixer\Phpdoc;

use PhpCsFixer\Tests\Test\AbstractFixerTestCase;

/**
 * @internal
 *
 * @covers \PhpCsFixer\Fixer\Phpdoc\PhpdocTagCasingFixer
 *
 * @extends AbstractFixerTestCase<\PhpCsFixer\Fixer\Phpdoc\PhpdocTagCasingFixer>
 *
 * @phpstan-import-type _AutogeneratedInputConfiguration from \PhpCsFixer\Fixer\Phpdoc\PhpdocTagCasingFixer
 */
final class PhpdocTagCasingFixerTest extends AbstractFixerTestCase
{
    /**
     * @param _AutogeneratedInputConfiguration $config
     *
     * @dataProvider provideFixCases
     */
    public function testFix(string $expected, ?string $input = null, array $config = []): void
    {
        $this->fixer->configure($config);

        $this->doTest($expected, $input);
    }

    /**
     * @return iterable<int, array{0: string, 1?: null|string, 2?: _AutogeneratedInputConfiguration}>
     */
    public static function provideFixCases(): iterable
    {
        yield [
            '<?php /** @inheritDoc */',
            '<?php /** @inheritdoc */',
        ];

        yield [
            '<?php /** @inheritDoc */',
            '<?php /** @inheritdoc */',
            ['tags' => ['inheritDoc']],
        ];

        yield [
            '<?php /** @inheritdoc */',
            '<?php /** @inheritDoc */',
            ['tags' => ['inheritdoc']],
        ];

        yield [
            '<?php /** {@inheritDoc} */',
            '<?php /** {@inheritdoc} */',
        ];

        yield [
            '<?php /** {@inheritDoc} */',
            '<?php /** {@inheritdoc} */',
            ['tags' => ['inheritDoc']],
        ];

        yield [
            '<?php /** {@inheritdoc} */',
            '<?php /** {@inheritDoc} */',
            ['tags' => ['inheritdoc']],
        ];
    }
}
