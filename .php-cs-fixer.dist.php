<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('example/diff')
    ->exclude('vendor')
    //->in('vendor/mysql-workbench-schema-exporter/doctrine1-exporter/lib')
    //->in('vendor/mysql-workbench-schema-exporter/doctrine2-exporter/lib')
    //->in('vendor/mysql-workbench-schema-exporter/node-exporter/lib')
    //->in('vendor/mysql-workbench-schema-exporter/propel-exporter/lib')
    //->in('vendor/mysql-workbench-schema-exporter/sencha-exporter/lib')
    //->in('vendor/mysql-workbench-schema-exporter/zend1-exporter/lib')
    ->in(__DIR__)
;

$config = new PhpCsFixer\Config();
return $config->setRules([
        '@PSR12' => true,
        'array_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'binary_operator_spaces' => ['operators' => ['=>' => 'single_space', '=' => 'single_space']],
        'blank_line_before_statement' => ['statements' => ['return']],
        'function_declaration' => ['closure_function_spacing' => 'none', 'closure_fn_spacing' => 'none'],
        'method_chaining_indentation' => true,
        'no_extra_blank_lines' => ['tokens' => ['attribute', 'break', 'case', 'continue', 'curly_brace_block', 'default', 'extra', 'parenthesis_brace_block', 'return', 'square_brace_block', 'switch', 'throw', 'use']],
        'phpdoc_no_package' => true,
        'statement_indentation' => true,
    ])
    ->setFinder($finder)
;