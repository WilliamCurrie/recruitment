<?php

/* TwigBundle:Exception:error.json.twig */
class __TwigTemplate_be6f5450bdf227f78846ae92299417baac69ae4615caa5d19477ba97dd5d00f0 extends Twig_Template
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
        $__internal_cec201e1552d0d8284a3a1ec2df5b60a3a8d972043735c17718a43dba92aed3c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_cec201e1552d0d8284a3a1ec2df5b60a3a8d972043735c17718a43dba92aed3c->enter($__internal_cec201e1552d0d8284a3a1ec2df5b60a3a8d972043735c17718a43dba92aed3c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.json.twig"));

        $__internal_d012cff0cf8f16bd4a2d1097004f96384036ae6b7c0d4ec798a6a527eb42d8b8 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d012cff0cf8f16bd4a2d1097004f96384036ae6b7c0d4ec798a6a527eb42d8b8->enter($__internal_d012cff0cf8f16bd4a2d1097004f96384036ae6b7c0d4ec798a6a527eb42d8b8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.json.twig"));

        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "message" => (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")))));
        echo "
";
        
        $__internal_cec201e1552d0d8284a3a1ec2df5b60a3a8d972043735c17718a43dba92aed3c->leave($__internal_cec201e1552d0d8284a3a1ec2df5b60a3a8d972043735c17718a43dba92aed3c_prof);

        
        $__internal_d012cff0cf8f16bd4a2d1097004f96384036ae6b7c0d4ec798a6a527eb42d8b8->leave($__internal_d012cff0cf8f16bd4a2d1097004f96384036ae6b7c0d4ec798a6a527eb42d8b8_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.json.twig";
    }

    public function isTraitable()
    {
        return false;
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
        return new Twig_Source("{{ { 'error': { 'code': status_code, 'message': status_text } }|json_encode|raw }}
", "TwigBundle:Exception:error.json.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/error.json.twig");
    }
}
