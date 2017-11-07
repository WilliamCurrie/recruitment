<?php

/* @Framework/Form/radio_widget.html.php */
class __TwigTemplate_7187ccd281e8405b85f09d5c0a9a0a3265871d1aafc5e29cff1d3b33787607f6 extends Twig_Template
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
        $__internal_a8b1f23191483612ab337d6dec6ff5662eeb9e5b02c08dc5a54e8f01d27e6af6 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a8b1f23191483612ab337d6dec6ff5662eeb9e5b02c08dc5a54e8f01d27e6af6->enter($__internal_a8b1f23191483612ab337d6dec6ff5662eeb9e5b02c08dc5a54e8f01d27e6af6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/radio_widget.html.php"));

        $__internal_3ce483cc45d19e0564a851108de3d570bc239417ad16bcc618e611dc858a5c22 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3ce483cc45d19e0564a851108de3d570bc239417ad16bcc618e611dc858a5c22->enter($__internal_3ce483cc45d19e0564a851108de3d570bc239417ad16bcc618e611dc858a5c22_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/radio_widget.html.php"));

        // line 1
        echo "<input type=\"radio\"
    <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>
    value=\"<?php echo \$view->escape(\$value) ?>\"
    <?php if (\$checked): ?> checked=\"checked\"<?php endif ?>
/>
";
        
        $__internal_a8b1f23191483612ab337d6dec6ff5662eeb9e5b02c08dc5a54e8f01d27e6af6->leave($__internal_a8b1f23191483612ab337d6dec6ff5662eeb9e5b02c08dc5a54e8f01d27e6af6_prof);

        
        $__internal_3ce483cc45d19e0564a851108de3d570bc239417ad16bcc618e611dc858a5c22->leave($__internal_3ce483cc45d19e0564a851108de3d570bc239417ad16bcc618e611dc858a5c22_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/radio_widget.html.php";
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
        return new Twig_Source("<input type=\"radio\"
    <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>
    value=\"<?php echo \$view->escape(\$value) ?>\"
    <?php if (\$checked): ?> checked=\"checked\"<?php endif ?>
/>
", "@Framework/Form/radio_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/radio_widget.html.php");
    }
}
