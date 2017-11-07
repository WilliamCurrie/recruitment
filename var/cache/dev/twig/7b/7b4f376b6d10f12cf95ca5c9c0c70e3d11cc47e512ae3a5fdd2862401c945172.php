<?php

/* @Framework/Form/form_row.html.php */
class __TwigTemplate_629e5dff37dc7490581bdb8e0e30699e97f8cb22485a74f2301dd94bc8f46489 extends Twig_Template
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
        $__internal_e027578fa564ffcddc84afbd85bc8ea128c6a790c66edfd61b2a5449f5d8eb0c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e027578fa564ffcddc84afbd85bc8ea128c6a790c66edfd61b2a5449f5d8eb0c->enter($__internal_e027578fa564ffcddc84afbd85bc8ea128c6a790c66edfd61b2a5449f5d8eb0c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_row.html.php"));

        $__internal_dc15935ae365b969ef9adaa6442eaa09b84f6e8041075c2b71bb54d49cbef918 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_dc15935ae365b969ef9adaa6442eaa09b84f6e8041075c2b71bb54d49cbef918->enter($__internal_dc15935ae365b969ef9adaa6442eaa09b84f6e8041075c2b71bb54d49cbef918_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_row.html.php"));

        // line 1
        echo "<div>
    <?php echo \$view['form']->label(\$form) ?>
    <?php echo \$view['form']->errors(\$form) ?>
    <?php echo \$view['form']->widget(\$form) ?>
</div>
";
        
        $__internal_e027578fa564ffcddc84afbd85bc8ea128c6a790c66edfd61b2a5449f5d8eb0c->leave($__internal_e027578fa564ffcddc84afbd85bc8ea128c6a790c66edfd61b2a5449f5d8eb0c_prof);

        
        $__internal_dc15935ae365b969ef9adaa6442eaa09b84f6e8041075c2b71bb54d49cbef918->leave($__internal_dc15935ae365b969ef9adaa6442eaa09b84f6e8041075c2b71bb54d49cbef918_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_row.html.php";
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
        return new Twig_Source("<div>
    <?php echo \$view['form']->label(\$form) ?>
    <?php echo \$view['form']->errors(\$form) ?>
    <?php echo \$view['form']->widget(\$form) ?>
</div>
", "@Framework/Form/form_row.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/form_row.html.php");
    }
}
