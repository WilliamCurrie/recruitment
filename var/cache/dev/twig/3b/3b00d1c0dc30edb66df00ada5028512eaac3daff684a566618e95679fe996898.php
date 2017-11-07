<?php

/* @Framework/FormTable/hidden_row.html.php */
class __TwigTemplate_851e4cecf476be3fc85b3a116a496730c5c50eca6d6d9590627e5817d0eaff9c extends Twig_Template
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
        $__internal_777fae460658ef75a59d18deca8b6d44982a0287a0884a5dba0d7e6f5ed3f5d0 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_777fae460658ef75a59d18deca8b6d44982a0287a0884a5dba0d7e6f5ed3f5d0->enter($__internal_777fae460658ef75a59d18deca8b6d44982a0287a0884a5dba0d7e6f5ed3f5d0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/hidden_row.html.php"));

        $__internal_b0539df2ebc42566db45b118b0b4ac6a1fdc1e32bcaa8c4b951a214d3967cc66 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b0539df2ebc42566db45b118b0b4ac6a1fdc1e32bcaa8c4b951a214d3967cc66->enter($__internal_b0539df2ebc42566db45b118b0b4ac6a1fdc1e32bcaa8c4b951a214d3967cc66_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/hidden_row.html.php"));

        // line 1
        echo "<tr style=\"display: none\">
    <td colspan=\"2\">
        <?php echo \$view['form']->widget(\$form); ?>
    </td>
</tr>
";
        
        $__internal_777fae460658ef75a59d18deca8b6d44982a0287a0884a5dba0d7e6f5ed3f5d0->leave($__internal_777fae460658ef75a59d18deca8b6d44982a0287a0884a5dba0d7e6f5ed3f5d0_prof);

        
        $__internal_b0539df2ebc42566db45b118b0b4ac6a1fdc1e32bcaa8c4b951a214d3967cc66->leave($__internal_b0539df2ebc42566db45b118b0b4ac6a1fdc1e32bcaa8c4b951a214d3967cc66_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/hidden_row.html.php";
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
        return new Twig_Source("<tr style=\"display: none\">
    <td colspan=\"2\">
        <?php echo \$view['form']->widget(\$form); ?>
    </td>
</tr>
", "@Framework/FormTable/hidden_row.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/FormTable/hidden_row.html.php");
    }
}
