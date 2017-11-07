<?php

/* @Framework/Form/percent_widget.html.php */
class __TwigTemplate_8f48836c284a4c6eee3bcdb602dc9ea8855e32e0222e62069ba235b86a2d5755 extends Twig_Template
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
        $__internal_41abfcd93b747f68fa8da0f4d3874e627d2afb93c006acccc95fcaa9647d6f1f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_41abfcd93b747f68fa8da0f4d3874e627d2afb93c006acccc95fcaa9647d6f1f->enter($__internal_41abfcd93b747f68fa8da0f4d3874e627d2afb93c006acccc95fcaa9647d6f1f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/percent_widget.html.php"));

        $__internal_4d9432d9f384f0f3360af02126026ed9b0f095a4f9c86b315e4037dda3662806 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4d9432d9f384f0f3360af02126026ed9b0f095a4f9c86b315e4037dda3662806->enter($__internal_4d9432d9f384f0f3360af02126026ed9b0f095a4f9c86b315e4037dda3662806_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/percent_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'text')) ?> %
";
        
        $__internal_41abfcd93b747f68fa8da0f4d3874e627d2afb93c006acccc95fcaa9647d6f1f->leave($__internal_41abfcd93b747f68fa8da0f4d3874e627d2afb93c006acccc95fcaa9647d6f1f_prof);

        
        $__internal_4d9432d9f384f0f3360af02126026ed9b0f095a4f9c86b315e4037dda3662806->leave($__internal_4d9432d9f384f0f3360af02126026ed9b0f095a4f9c86b315e4037dda3662806_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/percent_widget.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'text')) ?> %
", "@Framework/Form/percent_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/percent_widget.html.php");
    }
}
