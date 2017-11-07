<?php

/* @Framework/Form/form_widget_simple.html.php */
class __TwigTemplate_060223d6b36ec1d4d0c2ed8e1ed8878537fc5773283bd38ed23b634d38f025af extends Twig_Template
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
        $__internal_beec9c4327a0682931e2f25441b86321cf49c3a4f8fe6f416b6d3ce9f86ddcce = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_beec9c4327a0682931e2f25441b86321cf49c3a4f8fe6f416b6d3ce9f86ddcce->enter($__internal_beec9c4327a0682931e2f25441b86321cf49c3a4f8fe6f416b6d3ce9f86ddcce_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget_simple.html.php"));

        $__internal_d05d869cefbee090d153cf88e9061c5411ca06337af32f94bf36dfb6f23c6b53 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d05d869cefbee090d153cf88e9061c5411ca06337af32f94bf36dfb6f23c6b53->enter($__internal_d05d869cefbee090d153cf88e9061c5411ca06337af32f94bf36dfb6f23c6b53_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget_simple.html.php"));

        // line 1
        echo "<input type=\"<?php echo isset(\$type) ? \$view->escape(\$type) : 'text' ?>\" <?php echo \$view['form']->block(\$form, 'widget_attributes') ?><?php if (!empty(\$value) || is_numeric(\$value)): ?> value=\"<?php echo \$view->escape(\$value) ?>\"<?php endif ?> />
";
        
        $__internal_beec9c4327a0682931e2f25441b86321cf49c3a4f8fe6f416b6d3ce9f86ddcce->leave($__internal_beec9c4327a0682931e2f25441b86321cf49c3a4f8fe6f416b6d3ce9f86ddcce_prof);

        
        $__internal_d05d869cefbee090d153cf88e9061c5411ca06337af32f94bf36dfb6f23c6b53->leave($__internal_d05d869cefbee090d153cf88e9061c5411ca06337af32f94bf36dfb6f23c6b53_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_widget_simple.html.php";
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
        return new Twig_Source("<input type=\"<?php echo isset(\$type) ? \$view->escape(\$type) : 'text' ?>\" <?php echo \$view['form']->block(\$form, 'widget_attributes') ?><?php if (!empty(\$value) || is_numeric(\$value)): ?> value=\"<?php echo \$view->escape(\$value) ?>\"<?php endif ?> />
", "@Framework/Form/form_widget_simple.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/form_widget_simple.html.php");
    }
}
