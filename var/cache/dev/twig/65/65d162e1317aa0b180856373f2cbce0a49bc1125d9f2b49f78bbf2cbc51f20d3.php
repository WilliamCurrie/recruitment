<?php

/* @Framework/Form/form_rows.html.php */
class __TwigTemplate_f3dbc4680563fc20d0f56968621e8515a0943d71d71139c8564e120522b6f795 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_4ec57d922b7dad17806ab42829481442635c90df23300d7cd457127a8c30a056 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4ec57d922b7dad17806ab42829481442635c90df23300d7cd457127a8c30a056->enter($__internal_4ec57d922b7dad17806ab42829481442635c90df23300d7cd457127a8c30a056_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_rows.html.php"));

        $__internal_d06de4173163ed6fd7ac04ff4580cce2156942ba6d12881a69dfb152ecffc62a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d06de4173163ed6fd7ac04ff4580cce2156942ba6d12881a69dfb152ecffc62a->enter($__internal_d06de4173163ed6fd7ac04ff4580cce2156942ba6d12881a69dfb152ecffc62a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_rows.html.php"));

        // line 1
        echo "<?php foreach (\$form as \$child) : ?>
    <?php echo \$view['form']->row(\$child) ?>
<?php endforeach; ?>
";
        
        $__internal_4ec57d922b7dad17806ab42829481442635c90df23300d7cd457127a8c30a056->leave($__internal_4ec57d922b7dad17806ab42829481442635c90df23300d7cd457127a8c30a056_prof);

        
        $__internal_d06de4173163ed6fd7ac04ff4580cce2156942ba6d12881a69dfb152ecffc62a->leave($__internal_d06de4173163ed6fd7ac04ff4580cce2156942ba6d12881a69dfb152ecffc62a_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_rows.html.php";
    }

    public function getDebugInfo()
    {
        return array (  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<?php foreach (\$form as \$child) : ?>
    <?php echo \$view['form']->row(\$child) ?>
<?php endforeach; ?>
", "@Framework/Form/form_rows.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/form_rows.html.php");
    }
}
