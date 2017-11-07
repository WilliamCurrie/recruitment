<?php

/* @Framework/Form/form_widget_compound.html.php */
class __TwigTemplate_ca62ae5cdd8524b829712eadb070aa18b9fafcdf862dd67531b303926c0e3aca extends Twig_Template
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
        $__internal_edf7ad364a1f1719749e270d6a9ed4f26c36838bedbd2fb7cc30a3f93542c225 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_edf7ad364a1f1719749e270d6a9ed4f26c36838bedbd2fb7cc30a3f93542c225->enter($__internal_edf7ad364a1f1719749e270d6a9ed4f26c36838bedbd2fb7cc30a3f93542c225_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget_compound.html.php"));

        $__internal_cd3f7f418c31bb2172674833171d4f5b1bcf2f82491b40c5e16708786693bd3b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cd3f7f418c31bb2172674833171d4f5b1bcf2f82491b40c5e16708786693bd3b->enter($__internal_cd3f7f418c31bb2172674833171d4f5b1bcf2f82491b40c5e16708786693bd3b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget_compound.html.php"));

        // line 1
        echo "<div <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
    <?php if (!\$form->parent && \$errors): ?>
    <?php echo \$view['form']->errors(\$form) ?>
    <?php endif ?>
    <?php echo \$view['form']->block(\$form, 'form_rows') ?>
    <?php echo \$view['form']->rest(\$form) ?>
</div>
";
        
        $__internal_edf7ad364a1f1719749e270d6a9ed4f26c36838bedbd2fb7cc30a3f93542c225->leave($__internal_edf7ad364a1f1719749e270d6a9ed4f26c36838bedbd2fb7cc30a3f93542c225_prof);

        
        $__internal_cd3f7f418c31bb2172674833171d4f5b1bcf2f82491b40c5e16708786693bd3b->leave($__internal_cd3f7f418c31bb2172674833171d4f5b1bcf2f82491b40c5e16708786693bd3b_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_widget_compound.html.php";
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
        return new Twig_Source("<div <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
    <?php if (!\$form->parent && \$errors): ?>
    <?php echo \$view['form']->errors(\$form) ?>
    <?php endif ?>
    <?php echo \$view['form']->block(\$form, 'form_rows') ?>
    <?php echo \$view['form']->rest(\$form) ?>
</div>
", "@Framework/Form/form_widget_compound.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/form_widget_compound.html.php");
    }
}
