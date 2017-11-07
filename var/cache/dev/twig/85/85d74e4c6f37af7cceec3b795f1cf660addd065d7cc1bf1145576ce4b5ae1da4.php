<?php

/* @Framework/Form/checkbox_widget.html.php */
class __TwigTemplate_b9298d63de88e61c4095f5a3476826fbc0e871a5cf9001afcbe5304d12bff0ae extends Twig_Template
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
        $__internal_f0b8281f83b01243e85cfc5c117ad9a1e8d6f76bd15dccafe74912f001ee9f2e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f0b8281f83b01243e85cfc5c117ad9a1e8d6f76bd15dccafe74912f001ee9f2e->enter($__internal_f0b8281f83b01243e85cfc5c117ad9a1e8d6f76bd15dccafe74912f001ee9f2e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/checkbox_widget.html.php"));

        $__internal_359ed718fc255ff343fdb1932b1da5e5b64b86a534c055d57d5ce8ef83db58bd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_359ed718fc255ff343fdb1932b1da5e5b64b86a534c055d57d5ce8ef83db58bd->enter($__internal_359ed718fc255ff343fdb1932b1da5e5b64b86a534c055d57d5ce8ef83db58bd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/checkbox_widget.html.php"));

        // line 1
        echo "<input type=\"checkbox\"
    <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>
    <?php if (strlen(\$value) > 0): ?> value=\"<?php echo \$view->escape(\$value) ?>\"<?php endif ?>
    <?php if (\$checked): ?> checked=\"checked\"<?php endif ?>
/>
";
        
        $__internal_f0b8281f83b01243e85cfc5c117ad9a1e8d6f76bd15dccafe74912f001ee9f2e->leave($__internal_f0b8281f83b01243e85cfc5c117ad9a1e8d6f76bd15dccafe74912f001ee9f2e_prof);

        
        $__internal_359ed718fc255ff343fdb1932b1da5e5b64b86a534c055d57d5ce8ef83db58bd->leave($__internal_359ed718fc255ff343fdb1932b1da5e5b64b86a534c055d57d5ce8ef83db58bd_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/checkbox_widget.html.php";
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
        return new Twig_Source("<input type=\"checkbox\"
    <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>
    <?php if (strlen(\$value) > 0): ?> value=\"<?php echo \$view->escape(\$value) ?>\"<?php endif ?>
    <?php if (\$checked): ?> checked=\"checked\"<?php endif ?>
/>
", "@Framework/Form/checkbox_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/checkbox_widget.html.php");
    }
}
