<?php

/* @Framework/Form/money_widget.html.php */
class __TwigTemplate_291c3d4bd62c6797b3e472fcaefccafd2a3afdac8d4f89ad71f85e4e7e7d9ccf extends Twig_Template
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
        $__internal_fcf921e6f3842900bddf5af03e7c1a34a1ca471366f93ecb0d4d19eaf3eed76a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_fcf921e6f3842900bddf5af03e7c1a34a1ca471366f93ecb0d4d19eaf3eed76a->enter($__internal_fcf921e6f3842900bddf5af03e7c1a34a1ca471366f93ecb0d4d19eaf3eed76a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/money_widget.html.php"));

        $__internal_634874d28d35dbc5f18742832b93230d38850d4e04b7dba5a936ff05b7ed8840 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_634874d28d35dbc5f18742832b93230d38850d4e04b7dba5a936ff05b7ed8840->enter($__internal_634874d28d35dbc5f18742832b93230d38850d4e04b7dba5a936ff05b7ed8840_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/money_widget.html.php"));

        // line 1
        echo "<?php echo str_replace('";
        echo twig_escape_filter($this->env, (isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")), "html", null, true);
        echo "', \$view['form']->block(\$form, 'form_widget_simple'), \$money_pattern) ?>
";
        
        $__internal_fcf921e6f3842900bddf5af03e7c1a34a1ca471366f93ecb0d4d19eaf3eed76a->leave($__internal_fcf921e6f3842900bddf5af03e7c1a34a1ca471366f93ecb0d4d19eaf3eed76a_prof);

        
        $__internal_634874d28d35dbc5f18742832b93230d38850d4e04b7dba5a936ff05b7ed8840->leave($__internal_634874d28d35dbc5f18742832b93230d38850d4e04b7dba5a936ff05b7ed8840_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/money_widget.html.php";
    }

    public function isTraitable()
    {
        return false;
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
        return new Twig_Source("<?php echo str_replace('{{ widget }}', \$view['form']->block(\$form, 'form_widget_simple'), \$money_pattern) ?>
", "@Framework/Form/money_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/money_widget.html.php");
    }
}
