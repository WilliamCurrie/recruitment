<?php

/* @Framework/Form/search_widget.html.php */
class __TwigTemplate_4cf3aa60ff183caff474818c73a8b24c9260d5adcebaddd18fa8174a2ccebb88 extends Twig_Template
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
        $__internal_5d0ed1b204f6249482ddd01aaabd7d6c52b475bc898c686c52b85448b68db0ef = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_5d0ed1b204f6249482ddd01aaabd7d6c52b475bc898c686c52b85448b68db0ef->enter($__internal_5d0ed1b204f6249482ddd01aaabd7d6c52b475bc898c686c52b85448b68db0ef_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/search_widget.html.php"));

        $__internal_d712c2f820d747dd5a0f97be8606349ce5f6420c05520649df653175d635b2f1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d712c2f820d747dd5a0f97be8606349ce5f6420c05520649df653175d635b2f1->enter($__internal_d712c2f820d747dd5a0f97be8606349ce5f6420c05520649df653175d635b2f1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/search_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'search')) ?>
";
        
        $__internal_5d0ed1b204f6249482ddd01aaabd7d6c52b475bc898c686c52b85448b68db0ef->leave($__internal_5d0ed1b204f6249482ddd01aaabd7d6c52b475bc898c686c52b85448b68db0ef_prof);

        
        $__internal_d712c2f820d747dd5a0f97be8606349ce5f6420c05520649df653175d635b2f1->leave($__internal_d712c2f820d747dd5a0f97be8606349ce5f6420c05520649df653175d635b2f1_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/search_widget.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'search')) ?>
", "@Framework/Form/search_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/search_widget.html.php");
    }
}
