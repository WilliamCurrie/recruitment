<?php

/* @Framework/Form/form_enctype.html.php */
class __TwigTemplate_6afd84b4b390eaf3e016b941e569747cf037ddb9234a465d12c8cec73ba5546f extends Twig_Template
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
        $__internal_ab70686940d9ec8ae13a541b13397c265910985448524175624510f842b98374 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ab70686940d9ec8ae13a541b13397c265910985448524175624510f842b98374->enter($__internal_ab70686940d9ec8ae13a541b13397c265910985448524175624510f842b98374_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_enctype.html.php"));

        $__internal_37f1406cc0ca439423a0a86cf68f874d90add985bf1646ee4523d9fd8fe5d3da = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_37f1406cc0ca439423a0a86cf68f874d90add985bf1646ee4523d9fd8fe5d3da->enter($__internal_37f1406cc0ca439423a0a86cf68f874d90add985bf1646ee4523d9fd8fe5d3da_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_enctype.html.php"));

        // line 1
        echo "<?php if (\$form->vars['multipart']): ?>enctype=\"multipart/form-data\"<?php endif ?>
";
        
        $__internal_ab70686940d9ec8ae13a541b13397c265910985448524175624510f842b98374->leave($__internal_ab70686940d9ec8ae13a541b13397c265910985448524175624510f842b98374_prof);

        
        $__internal_37f1406cc0ca439423a0a86cf68f874d90add985bf1646ee4523d9fd8fe5d3da->leave($__internal_37f1406cc0ca439423a0a86cf68f874d90add985bf1646ee4523d9fd8fe5d3da_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_enctype.html.php";
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
        return new Twig_Source("<?php if (\$form->vars['multipart']): ?>enctype=\"multipart/form-data\"<?php endif ?>
", "@Framework/Form/form_enctype.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/form_enctype.html.php");
    }
}
