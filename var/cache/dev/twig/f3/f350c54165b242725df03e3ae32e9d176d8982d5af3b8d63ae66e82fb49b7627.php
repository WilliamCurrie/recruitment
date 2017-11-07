<?php

/* @Framework/Form/choice_options.html.php */
class __TwigTemplate_6345b9a229c59d32a6438fb9b06336ec4df8ce4b96e430931cffc1106f2e4e97 extends Twig_Template
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
        $__internal_716af3eaa40a68a42f9265f10aaa898bf7ba7a0525d8b98f1ea41d056cc4aafa = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_716af3eaa40a68a42f9265f10aaa898bf7ba7a0525d8b98f1ea41d056cc4aafa->enter($__internal_716af3eaa40a68a42f9265f10aaa898bf7ba7a0525d8b98f1ea41d056cc4aafa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/choice_options.html.php"));

        $__internal_014dfd5034df791979e4c2c9cdb31fcd13c0e926b7c4edf769b12c4157934a83 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_014dfd5034df791979e4c2c9cdb31fcd13c0e926b7c4edf769b12c4157934a83->enter($__internal_014dfd5034df791979e4c2c9cdb31fcd13c0e926b7c4edf769b12c4157934a83_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/choice_options.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'choice_widget_options') ?>
";
        
        $__internal_716af3eaa40a68a42f9265f10aaa898bf7ba7a0525d8b98f1ea41d056cc4aafa->leave($__internal_716af3eaa40a68a42f9265f10aaa898bf7ba7a0525d8b98f1ea41d056cc4aafa_prof);

        
        $__internal_014dfd5034df791979e4c2c9cdb31fcd13c0e926b7c4edf769b12c4157934a83->leave($__internal_014dfd5034df791979e4c2c9cdb31fcd13c0e926b7c4edf769b12c4157934a83_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/choice_options.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'choice_widget_options') ?>
", "@Framework/Form/choice_options.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/choice_options.html.php");
    }
}
