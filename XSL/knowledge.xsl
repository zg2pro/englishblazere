<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE stylesheet [
<!ENTITY Eacute  "&Eacute;" >
]>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
	<h2>
			<xsl:if test="$hl='en'">KNOWLEDGE
			</xsl:if>
			<xsl:if test="$hl='fr'">COMPETENCES</xsl:if>
			</h2>
			<xsl:apply-templates/>
	</xsl:template>
	
	<xsl:template match="//science">
		<ul>
		<xsl:for-each select="field">
			<li><xsl:value-of disable-output-escaping="yes"  select="."/></li>
		</xsl:for-each>
		</ul>
	</xsl:template>
	
	<xsl:template match="//miscellaneous">
		<ul>
		<xsl:for-each select="field">
			<li><xsl:value-of disable-output-escaping="yes"  select="."/></li>
		</xsl:for-each>
		</ul>
	</xsl:template>
	
	
</xsl:stylesheet>