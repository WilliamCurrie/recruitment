<?php

/* @Framework/Form/widget_container_attributes.html.php */
class __TwigTemplate_6b4916d2004a4f8ede0b9a978dccc570eb5eefd5440914c7cb9728a5367bb188 extends Twig_Template
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
        $__internal_eec5cc39642cfea308621dbc0190501984d675e32492f233cff91d07e1636fed = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_eec5cc39642cfea308621dbc0190501984d675e32492f233cff91d07e1636fed->enter($__internal_eec5cc39642cfea308621dbc0190501984d675e32492f233cff91d07e1636fed_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/widget_container_attributes.html.php"));

        $__internal_c5efc0666daf3a062be8ff6fddadc48d201a9323343702b4edebba4051028dc8 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c5efc0666daf3a062be8ff6fddadc48d201a9323343702b4edebba4051028dc8->enter($__internal_c5efc0666daf3a062be8ff6fddadc48d201a9323343702b4edebba4051028dc8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/widget_container_attributes.html.php"));

        // line 1
        echo "<?php if (!empty(\$id)): ?>id=\"<?php echo \$view->escape(\$id) ?>\"<?php endif ?>
<?php echo \$attr ? ' '.\$view['form']->block(\$form, 'attributes') : '' ?>
";
        
        $__internal_eec5cc39642cfea308621dbc0190501984d675e32492f233cff91d07e1636fed->leave($__internal_eec5cc39642cfea308621dbc0190501984d675e32492f233cff91d07e1636fed_prof);

        
        $__internal_c5efc0666daf3a062be8ff6fddadc48d201a9323343702b4edebba4051028dc8->leave($__internal_c5efc0666daf3a062be8ff6fddadc48d201a9323343702b4edebba4051028dc8_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/widget_container_attributes.html.php";
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
        return new Twig_Source("<?php if (!empty(\$id)): ?>id=\"<?php echo \$view->escape(\$id) ?>\"<?php endif ?>
<?php echo \$attr ? ' '.\$view['form']->block(\$form, 'attributes') : '' ?>
", "@Framework/Form/widget_container_attributes.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/widget_container_attributes.html.php");
    }
}
