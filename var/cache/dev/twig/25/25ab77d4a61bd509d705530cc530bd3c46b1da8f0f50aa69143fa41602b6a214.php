<?php

/* TwigBundle:Exception:error.atom.twig */
class __TwigTemplate_9f20f48ce4eda8961016c33b85820ee58d4bd9bb0356b8dd3acc20dfc746431b extends Twig_Template
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
        $__internal_f6fe90fbc2a1885e49342c6126ec3afbd7508bca25a85757626f15cfaf53a779 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f6fe90fbc2a1885e49342c6126ec3afbd7508bca25a85757626f15cfaf53a779->enter($__internal_f6fe90fbc2a1885e49342c6126ec3afbd7508bca25a85757626f15cfaf53a779_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.atom.twig"));

        $__internal_faa3d0ea7038f64444ae877968cdbc70e9eb9b704c275419b7acbbfa9b1bad3c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_faa3d0ea7038f64444ae877968cdbc70e9eb9b704c275419b7acbbfa9b1bad3c->enter($__internal_faa3d0ea7038f64444ae877968cdbc70e9eb9b704c275419b7acbbfa9b1bad3c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.atom.twig"));

        // line 1
        echo twig_include($this->env, $context, "@Twig/Exception/error.xml.twig");
        echo "
";
        
        $__internal_f6fe90fbc2a1885e49342c6126ec3afbd7508bca25a85757626f15cfaf53a779->leave($__internal_f6fe90fbc2a1885e49342c6126ec3afbd7508bca25a85757626f15cfaf53a779_prof);

        
        $__internal_faa3d0ea7038f64444ae877968cdbc70e9eb9b704c275419b7acbbfa9b1bad3c->leave($__internal_faa3d0ea7038f64444ae877968cdbc70e9eb9b704c275419b7acbbfa9b1bad3c_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.atom.twig";
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
        return new Twig_Source("{{ include('@Twig/Exception/error.xml.twig') }}
", "TwigBundle:Exception:error.atom.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/error.atom.twig");
    }
}
