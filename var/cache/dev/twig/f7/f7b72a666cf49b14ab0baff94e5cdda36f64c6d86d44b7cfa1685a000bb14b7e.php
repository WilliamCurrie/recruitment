<?php

/* @Framework/Form/number_widget.html.php */
class __TwigTemplate_81561cd895801615cefaa548cf3a21cdc1e7b993a07e69816fd119705675aa93 extends Twig_Template
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
        $__internal_2dcc91b847374c26091c7c08786cb4d71a0b146d2601a670d8a0f5ec27fbdc56 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_2dcc91b847374c26091c7c08786cb4d71a0b146d2601a670d8a0f5ec27fbdc56->enter($__internal_2dcc91b847374c26091c7c08786cb4d71a0b146d2601a670d8a0f5ec27fbdc56_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/number_widget.html.php"));

        $__internal_28822212e4eac898b1703b252afad90a579d09273b9af3ed4529e694a97eb8f3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_28822212e4eac898b1703b252afad90a579d09273b9af3ed4529e694a97eb8f3->enter($__internal_28822212e4eac898b1703b252afad90a579d09273b9af3ed4529e694a97eb8f3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/number_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'text')) ?>
";
        
        $__internal_2dcc91b847374c26091c7c08786cb4d71a0b146d2601a670d8a0f5ec27fbdc56->leave($__internal_2dcc91b847374c26091c7c08786cb4d71a0b146d2601a670d8a0f5ec27fbdc56_prof);

        
        $__internal_28822212e4eac898b1703b252afad90a579d09273b9af3ed4529e694a97eb8f3->leave($__internal_28822212e4eac898b1703b252afad90a579d09273b9af3ed4529e694a97eb8f3_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/number_widget.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'text')) ?>
", "@Framework/Form/number_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/number_widget.html.php");
    }
}
