========================
Rule set ``@PhpCsFixer``
========================

Rule set as used by the PHP CS Fixer development team, highly opinionated.

Rules
-----

- `@PER-CS <./PER-CS.rst>`_
- `@Symfony <./Symfony.rst>`_
- `blank_line_before_statement <./../rules/whitespace/blank_line_before_statement.rst>`_ with config:

  ``['statements' => ['break', 'case', 'continue', 'declare', 'default', 'exit', 'goto', 'include', 'include_once', 'phpdoc', 'require', 'require_once', 'return', 'switch', 'throw', 'try', 'yield', 'yield_from']]``

- `combine_consecutive_issets <./../rules/language_construct/combine_consecutive_issets.rst>`_
- `combine_consecutive_unsets <./../rules/language_construct/combine_consecutive_unsets.rst>`_
- `empty_loop_body <./../rules/control_structure/empty_loop_body.rst>`_
- `explicit_indirect_variable <./../rules/language_construct/explicit_indirect_variable.rst>`_
- `explicit_string_variable <./../rules/string_notation/explicit_string_variable.rst>`_
- `fully_qualified_strict_types <./../rules/import/fully_qualified_strict_types.rst>`_ with config:

  ``['import_symbols' => true]``

- `heredoc_to_nowdoc <./../rules/string_notation/heredoc_to_nowdoc.rst>`_
- `method_argument_space <./../rules/function_notation/method_argument_space.rst>`_ with config:

  ``['on_multiline' => 'ensure_fully_multiline']``

- `method_chaining_indentation <./../rules/whitespace/method_chaining_indentation.rst>`_
- `multiline_comment_opening_closing <./../rules/comment/multiline_comment_opening_closing.rst>`_
- `multiline_whitespace_before_semicolons <./../rules/semicolon/multiline_whitespace_before_semicolons.rst>`_ with config:

  ``['strategy' => 'new_line_for_chained_calls']``

- `no_extra_blank_lines <./../rules/whitespace/no_extra_blank_lines.rst>`_ with config:

  ``['tokens' => ['attribute', 'break', 'case', 'continue', 'curly_brace_block', 'default', 'extra', 'parenthesis_brace_block', 'return', 'square_brace_block', 'switch', 'throw', 'use']]``

- `no_superfluous_elseif <./../rules/control_structure/no_superfluous_elseif.rst>`_
- `no_superfluous_phpdoc_tags <./../rules/phpdoc/no_superfluous_phpdoc_tags.rst>`_ with config:

  ``['allow_mixed' => true, 'remove_inheritdoc' => true]``

- `no_unneeded_control_parentheses <./../rules/control_structure/no_unneeded_control_parentheses.rst>`_ with config:

  ``['statements' => ['break', 'clone', 'continue', 'echo_print', 'negative_instanceof', 'others', 'return', 'switch_case', 'yield', 'yield_from']]``

- `no_useless_else <./../rules/control_structure/no_useless_else.rst>`_
- `no_useless_return <./../rules/return_notation/no_useless_return.rst>`_
- `no_whitespace_before_comma_in_array <./../rules/array_notation/no_whitespace_before_comma_in_array.rst>`_ with config:

  ``['after_heredoc' => true]``

- `operator_linebreak <./../rules/operator/operator_linebreak.rst>`_
- `ordered_class_elements <./../rules/class_notation/ordered_class_elements.rst>`_
- `ordered_types <./../rules/class_notation/ordered_types.rst>`_
- `php_unit_data_provider_method_order <./../rules/php_unit/php_unit_data_provider_method_order.rst>`_
- `php_unit_internal_class <./../rules/php_unit/php_unit_internal_class.rst>`_
- `php_unit_test_class_requires_covers <./../rules/php_unit/php_unit_test_class_requires_covers.rst>`_
- `phpdoc_add_missing_param_annotation <./../rules/phpdoc/phpdoc_add_missing_param_annotation.rst>`_
- `phpdoc_no_empty_return <./../rules/phpdoc/phpdoc_no_empty_return.rst>`_
- `phpdoc_order_by_value <./../rules/phpdoc/phpdoc_order_by_value.rst>`_
- `phpdoc_types_order <./../rules/phpdoc/phpdoc_types_order.rst>`_
- `phpdoc_var_annotation_correct_order <./../rules/phpdoc/phpdoc_var_annotation_correct_order.rst>`_
- `protected_to_private <./../rules/class_notation/protected_to_private.rst>`_
- `return_assignment <./../rules/return_notation/return_assignment.rst>`_
- `self_static_accessor <./../rules/class_notation/self_static_accessor.rst>`_
- `single_line_comment_style <./../rules/comment/single_line_comment_style.rst>`_
- `single_line_empty_body <./../rules/basic/single_line_empty_body.rst>`_
- `string_implicit_backslashes <./../rules/string_notation/string_implicit_backslashes.rst>`_
- `trailing_comma_in_multiline <./../rules/control_structure/trailing_comma_in_multiline.rst>`_ with config:

  ``['after_heredoc' => true, 'elements' => ['array_destructuring', 'arrays']]``

- `whitespace_after_comma_in_array <./../rules/array_notation/whitespace_after_comma_in_array.rst>`_ with config:

  ``['ensure_single_space' => true]``


Disabled rules
--------------

- `single_line_throw <./../rules/function_notation/single_line_throw.rst>`_
