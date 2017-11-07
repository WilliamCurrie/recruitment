<?php

/* @Framework/Form/choice_attributes.html.php */
class __TwigTemplate_0dbc6f84a80434963d388a67158bd2ea15b4f47e964b9b1606a015caeccbf0ee extends Twig_Template
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
        $__internal_b011270d8ffe2dd0c2b3ada0b899b57eb489aa49cc1d06c31874f46de0d49614 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b011270d8ffe2dd0c2b3ada0b899b57eb489aa49cc1d06c31874f46de0d49614->enter($__internal_b011270d8ffe2dd0c2b3ada0b899b57eb489aa49cc1d06c31874f46de0d49614_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/choice_attributes.html.php"));

        $__internal_bb110b7c06356d70652e61c8a1e87540acf0b6e620f71cc5f459d630d11fe51e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bb110b7c06356d70652e61c8a1e87540acf0b6e620f71cc5f459d630d11fe51e->enter($__internal_bb110b7c06356d70652e61c8a1e87540acf0b6e620f71cc5f459d630d11fe51e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/choice_attributes.html.php"));

        // line 1
        echo "<?php if (\$disabled): ?>disabled=\"disabled\" <?php endif ?>
<?php foreach (\$choice_attr as \$k => \$v): ?>
<?php if (\$v === true): ?>
<?php printf('%s=\"%s\" ', \$view->escape(\$k), \$view->escape(\$k)) ?>
<?php elseif (\$v !== false): ?>
<?php printf('%s=\"%s\" ', \$view->escape(\$k), \$view->escape(\$v)) ?>
<?php endif ?>
<?php endforeach ?>
";
        
        $__internal_b011270d8ffe2dd0c2b3ada0b899b57eb489aa49cc1d06c31874f46de0d49614->leave($__internal_b011270d8ffe2dd0c2b3ada0b899b57eb489aa49cc1d06c31874f46de0d49614_prof);

        
        $__internal_bb110b7c06356d70652e61c8a1e87540acf0b6e620f71cc5f459d630d11fe51e->leave($__internal_bb110b7c06356d70652e61c8a1e87540acf0b6e620f71cc5f459d630d11fe51e_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/choice_attributes.html.php";
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
        return new Twig_Source("<?php if (\$disabled): ?>disabled=\"disabled\" <?php endif ?>
<?php foreach (\$choice_attr as \$k => \$v): ?>
<?php if (\$v === true): ?>
<?php printf('%s=\"%s\" ', \$view->escape(\$k), \$view->escape(\$k)) ?>
<?php elseif (\$v !== false): ?>
<?php printf('%s=\"%s\" ', \$view->escape(\$k), \$view->escape(\$v)) ?>
<?php endif ?>
<?php endforeach ?>
", "@Framework/Form/choice_attributes.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/choice_attributes.html.php");
    }
}
